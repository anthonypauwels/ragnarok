<?php
namespace Pangu\Metadata;

use InvalidArgumentException;

/**
 * Class MetadataGenerator
 * @package Pangu\Metadata
 */
class MetadataGenerator
{
    /** @var string Prefix for Twitter tags */
    const TWITTER_PREFIX = 'twitter:';

    /** @var string Prefix for Opengraph tags */
    const OPENGRAPH_PREFIX = 'og:';

    /** @var MetadataGenerator */
    protected static MetadataGenerator $instance;

    /** @var array Default meta tags, commonly used by search engine */
    protected array $meta = [];

    /** @var array Twitter meta tags, used only by Twitter */
    protected array $twitter = [];

    /** @var array Opengraph meta tags, used by Facebook, Instagram, Whatsapp, Discord, etc */
    protected array $opengraph = [];

    /** @var string */
    protected string $prefixUrl = '';

    /**
     * Init a default instance called statically
     *
     * @return MetadataGenerator
     */
    public static function init():MetadataGenerator
    {
        return self::$instance = new self();
    }

    /**
     * Return the MetadataGenerator instance
     *
     * @return MetadataGenerator
     */
    public static function getInstance():MetadataGenerator
    {
        if ( self::$instance === null ) {
            self::init();
        }

        return self::$instance;
    }

    /**
     * Calling class methods statically
     *
     * @param $name
     * @param $arguments
     * @return mixed
     */
    public static function __callStatic($name, $arguments)
    {
        $instance = self::getInstance();

        if ( !method_exists( $instance, $name ) ) {
            throw new InvalidArgumentException('[' . static::class . '::' . $name . '] method is not implemented');
        }

        return call_user_func_array( [ $instance, $name ], $arguments );
    }

    /**
     * Set the prefix URL used by image and url tags
     *
     * @param $prefix_url
     * @return $this
     */
    public function setPrefixUrl($prefix_url): static
    {
        $this->prefixUrl = $prefix_url;

        return $this;
    }

    /**
     * Set an array of tags
     *
     * @param array $tags
     * @return $this
     */
    public function setTags(array $tags): static
    {
        foreach ( $tags as $key => $value ) {
            if ( $key & MetaProtocol::META ) {
                switch ( $key ) {
                    case 'title':
                    case 'description':
                    case 'url':
                    case 'robots':
                        $this->{$key}( $value, MetaProtocol::META );
                        break;

                    default:
                        $this->meta( $key, $value );
                }
            }

            if ( $key & MetaProtocol::TWITTER ) {
                switch ( $key ) {
                    case 'title':
                    case 'description':
                    case 'url':
                    case 'card':
                    case 'site':
                    case 'creator':
                        $this->{$key}( $value, MetaProtocol::TWITTER );
                        break;

                    case 'image':
                        $values = array_merge( $value, [ MetaProtocol::TWITTER ] );
                        $this->image( ...$values );
                        break;

                    default:
                        $this->twitter( $key, $value );
                }
            }

            if ( $key & MetaProtocol::OPENGRAPH ) {
                switch ( $key ) {
                    case 'title':
                    case 'description':
                    case 'url':
                    case 'app_id':
                    case 'site':
                    case 'admins':
                        $this->{$key}( $value, MetaProtocol::OPENGRAPH );
                        break;

                    case 'image':
                        $values = array_merge( $value, [ MetaProtocol::OPENGRAPH ] );
                        $this->image( ...$values );
                        break;

                    case 'type':
                        $values = array_merge( $value, [ MetaProtocol::OPENGRAPH ] );
                        $this->type( ...$values );
                        break;

                    default:
                        $this->opengraph( $key, $value );
                }
            }

            if ( !is_integer( $key ) ) {
                if ( method_exists( $this, $key ) ) {
                    $this->{$key}( ...$value );
                } else {
                    $this->meta( $key, $value );
                }
            }
        }

        return $this;
    }

    /**
     * Set the page title in meta tags
     *
     * @param string $title
     * @param int $metadata_flags
     * @return $this
     */
    public function title(string $title, int $metadata_flags = MetaProtocol::ALL): static
    {
        if ( $this->ifMeta( $metadata_flags ) ) {
            $this->meta( 'title', $title );
        }

        if ( $this->ifTwitter( $metadata_flags ) ) {
            $this->twitter( 'title', $title );
        }

        if ( $this->ifOpengraph( $metadata_flags ) ) {
            $this->opengraph( 'title', $title );
        }

        return $this;
    }

    /**
     * Set the page description in meta tags
     *
     * @param string $description
     * @param int $metadata_flags
     * @return $this
     */
    public function description(string $description, int $metadata_flags = MetaProtocol::ALL): static
    {
        if ( $this->ifMeta( $metadata_flags ) ) {
            $this->meta( 'description', $description );
        }

        if ( $this->ifTwitter( $metadata_flags ) ) {
            $this->twitter( 'description', $description );
        }

        if ( $this->ifOpengraph( $metadata_flags ) ) {
            $this->opengraph( 'description', $description );
        }

        return $this;
    }

    /**
     * Set the image for the page used for cards inside app; Can be used to set image options like size or mimetype
     *
     * @param string $url
     * @param array $options
     * @param int $metadata_flags
     * @return $this
     */
    public function image(string $url, array $options = [], int $metadata_flags = MetaProtocol::TWITTER | MetaProtocol::OPENGRAPH): static
    {
        $meta = [ 'width' => null, 'height' => null, 'type' => null, 'alt' => null, 'secure' => null];
        $options = array_intersect_key( $options, array_flip( array_keys( $meta ) ) );
        $options = array_filter( array_merge( $meta, $options ) );

        switch ( $options['type'] ) {
            case 'jpeg' :
            case 'jpg' :
            case 'png' :
            case 'gif' :
                $options['type'] = 'image/' . strtolower( $options['type'] );
                break;
        }

        if ( $this->ifTwitter( $metadata_flags ) ) {
            $this->twitter( 'image', $this->getPrefixUrl() . $url );

            foreach ( $options as $key => $value ) {
                $this->twitter( 'image:' . $key, $value );
            }
        }

        if ( $this->ifOpengraph( $metadata_flags ) ) {
            $this->opengraph( 'image', $this->getPrefixUrl() . $url );

            foreach ( $options as $key => $value ) {
                $this->opengraph( 'image:' . $key, $value );
            }
        }

        return $this;
    }

    /**
     * Set the page URL; by default, it's the current URL
     *
     * @param string|null $url
     * @param int $metadata_flags
     * @return $this
     */
    public function url(?string $url = null, int $metadata_flags = MetaProtocol::TWITTER | MetaProtocol::OPENGRAPH): static
    {
        if ( $url === null ) { // no URL has been set so we fetch the current url
            $url = $_SERVER[ 'REQUEST_URI' ];
        }

        if ( $this->ifTwitter( $metadata_flags ) ) {
            $this->twitter( 'url', $this->getPrefixUrl() . $url );
        }

        if ( $this->ifOpengraph( $metadata_flags ) ) {
            $this->opengraph( 'url', $this->getPrefixUrl() . $url );
        }

        return $this;
    }

    /**
     * Set the content og type
     *
     * @param string $type
     * @param array $options
     * @return $this
     */
    public function type(string $type = 'website', array $options = [] ): static
    {
        $prefix = self::OPENGRAPH_PREFIX;
        $authorized_keys = [];

        switch ( $type ) {
            case 'music.song' :
                $prefix = 'music:';
                $this->opengraph( 'type', 'music.song' );
                $authorized_keys = ['duration', 'album', 'album:disc', 'album:track', 'musician'];
                break;

            case 'music.album' :
                $prefix = 'music:';
                $this->opengraph( 'type', 'music.album' );
                $authorized_keys = ['song', 'song:disc', 'song:track', 'musician', 'release_date'];
                break;

            case 'music.playlist' :
                $prefix = 'music:';
                $this->opengraph( 'type', 'music.playlist' );
                $authorized_keys = ['song', 'song:disc', 'song:track', 'creator'];
                break;

            case 'music.radio_station' :
                $prefix = 'music:';
                $this->opengraph( 'type', 'music.radio_station' );
                $authorized_keys = ['creator'];
                break;

            case 'music' :
                $this->opengraph( 'type', 'music' );
                break;

            case 'video.tv_show' :
            case 'video.other' :
            case 'video.movie' :
                $prefix = 'video:';
                $this->opengraph( 'type', 'video' );
                $authorized_keys = ['actor', 'actor:role', 'director', 'writer', 'duration', 'release_date', 'tag'];
                break;

            case 'video.episode' :
                $prefix = 'video:';
                $this->opengraph( 'type', 'video' );
                $authorized_keys = ['actor', 'actor:role', 'director', 'writer', 'duration', 'release_date', 'tag', 'series'];
                break;

            case 'video' :
                $this->opengraph( 'type', 'video' );
                break;

            case 'article' :
                $prefix = 'article:';
                $this->opengraph( 'type', 'article' );
                $authorized_keys = ['published_time', 'modified_time', 'expiration_time', 'author', 'section', 'tag'];
                break;

            case 'book' :
                $prefix = 'book:';
                $this->opengraph( 'type', 'book' );
                $authorized_keys = ['author', 'isbn', 'release_date', 'tag'];
                break;

            case 'profile' :
                $prefix = 'profile:';
                $this->opengraph( 'type', 'profile' );
                $authorized_keys = ['first_name', 'last_name', 'username', 'gender'];
                break;

            default :
                $this->opengraph( 'type', 'website' );
        }

        foreach ( $options as $key => $value ) {
            if ( in_array( $key, $authorized_keys ) ) {
                $this->opengraph( $key, $value, $prefix );
            }
        }

        return $this;
    }

    /**
     * Set the author's name
     *
     * @param string $author
     * @return $this
     */
    public function author(string $author): static
    {
        $this->meta( 'author', $author );

        return $this;
    }

    /**
     * Set the Twitter card format
     *
     * @param string $card_type
     * @return $this
     */
    public function twitterCard(string $card_type = 'summary'): static
    {
        if ( !in_array( $card_type, [ 'summary', 'summary_large_image', 'app', 'player' ] ) ) {
            $card_type = 'summary';
        }

        $this->twitter( 'card', $card_type );

        return $this;
    }

    /**
     * Set the twitter website profile
     *
     * @param string $twitter_site
     * @return $this
     */
    public function twitterSite(string $twitter_site): static
    {
        $this->twitter( 'site', $twitter_site );

        return $this;
    }

    /**
     * Set the twitter author profile
     *
     * @param string $twitter_creator
     * @return $this
     */
    public function twitterCreator(string $twitter_creator): static
    {
        $this->twitter( 'creator', $twitter_creator );

        return $this;
    }

    /**
     * Set the facebook app_id
     *
     * @param string $app_id
     * @return $this
     */
    public function fbAppId(string $app_id): static
    {
        $this->meta( 'fb:app_id', $app_id );

        return $this;
    }

    /**
     * Set the facebook admins tag
     *
     * @param string $admins
     * @return $this
     */
    public function FbAdmins(string $admins): static
    {
        $this->meta( 'fb:admins', $admins );

        return $this;
    }

    /**
     * Set the og:site_name tag
     *
     * @param string $site_name
     * @return $this
     */
    public function siteName(string $site_name): static
    {
        $this->opengraph( 'site_name', $site_name );

        return $this;
    }

    /**
     * Disable (or enable if $value is true) the pinterest-rich-pin
     *
     * @param bool $value
     * @return $this
     */
    public function disablePinterestRichPin(bool $value = true): static
    {
        $this->meta( 'pinterest-rich-pin', !$value ? 'false' : 'true' );

        return $this;
    }

    /**
     * Set the robot meta tag
     *
     * @param mixed ...$values
     * @return MetadataGenerator
     */
    public function robots(...$values): static
    {
        if ( isset( $values[0] ) ) {
            $values = $values[0];
        }

        $authorized_values = [ 'all', 'noindex', 'nofollow', 'none', 'noarchive', 'nosnippet', 'notranslate', 'noimageindex', ];

        $this->meta('robots', implode(', ', array_intersect( $values, $authorized_values ) ) );

        return $this;
    }

    /**
     * Set a meta tag with given key and given value
     *
     * @param string $name
     * @param $value
     * @return $this
     */
    public function meta(string $name, $value): static
    {
        $this->meta[] = compact( 'name', 'value' );

        return $this;
    }

    /**
     * Set a meta tag for Twitter
     *
     * @param string $name
     * @param $value
     * @return $this
     */
    public function twitter(string $name, $value): static
    {
        $this->twitter[] = compact( 'name', 'value' );

        return $this;
    }

    /**
     * Set a meta tag for Opengraph
     *
     * @param string $name
     * @param $value
     * @param string $prefix
     * @return $this
     */
    public function opengraph(string $name, $value, string $prefix = self::OPENGRAPH_PREFIX): static
    {
        $this->opengraph[] = compact( 'name', 'value', 'prefix' );

        return $this;
    }

    /**
     * Generate the HTML code of meta tags
     *
     * @param int $metadata_flags Determine the type of meta to generate
     * @return string
     */
    public function toHtml(int $metadata_flags = MetaProtocol::ALL):string
    {
        $buffer = '';

        if ( $this->ifMeta( $metadata_flags ) ) {
            foreach ( $this->meta as $tag ) {
                $buffer.= '<meta name="' . $tag[ 'name' ] . '" content="' . $tag[ 'value' ] . '">' . PHP_EOL;
            }
        }

        if ( $this->ifTwitter( $metadata_flags ) ) {
            foreach ( $this->twitter as $tag ) {
                $buffer.= '<meta name="' . self::TWITTER_PREFIX . $tag[ 'name' ] . '" content="' . $tag[ 'value' ] . '">' . PHP_EOL;
            }
        }

        if ( $this->ifOpengraph( $metadata_flags ) ) {
            foreach ( $this->opengraph as $tag ) {
                $buffer.= '<meta name="' . $tag[ 'prefix' ] . $tag[ 'name' ] . '" content="' . $tag[ 'value' ] . '">' . PHP_EOL;
            }
        }

        return $buffer;
    }

    /**
     * Print the generated HTML code
     *
     * @param int $metadata_flags  Determine the type of meta to generate
     */
    public function print(int $metadata_flags = MetaProtocol::ALL): void
    {
        echo $this->toHtml( $metadata_flags );
    }

    /**
     * Return the HTML code of meta tags with default parameter
     *
     * @return string
     */
    public function __toString()
    {
        return $this->toHtml();
    }

    /**
     * Conditional method to check the $metadata_flags
     *
     * @param $metadata_flags
     * @return bool
     */
    protected function ifMeta($metadata_flags):bool
    {
        return $metadata_flags & MetaProtocol::ALL || $metadata_flags & MetaProtocol::META;
    }

    /**
     * Conditional method to check the $metadata_flags
     *
     * @param $metadata_flags
     * @return bool
     */
    protected function ifTwitter($metadata_flags):bool
    {
        return $metadata_flags & MetaProtocol::ALL || $metadata_flags & MetaProtocol::TWITTER;
    }

    /**
     * Conditional method to check the $metadata_flags
     *
     * @param $metadata_flags
     * @return bool
     */
    protected function ifOpengraph($metadata_flags):bool
    {
        return $metadata_flags & MetaProtocol::ALL || $metadata_flags & MetaProtocol::OPENGRAPH;
    }

    /**
     * Return the prefix URL, mostly the domain name
     *
     * @return string
     */
    protected function getPrefixUrl():string
    {
        if ( $this->prefixUrl !== '' ) {
            return $this->prefixUrl;
        }

        if( isset( $_SERVER[ 'HTTPS' ] ) && $_SERVER[ 'HTTPS' ] === 'on' ) {
            $url = 'https';
        } else {
            $url = 'http';
        }

        $url .= '://';
        $url .= $_SERVER[ 'HTTP_HOST' ];

        return $url;
    }
}