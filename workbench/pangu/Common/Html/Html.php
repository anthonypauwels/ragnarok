<?php
namespace Pangu\Common\Html;

use Pangu\Common\Traits\HtmlAttributes;

/**
 * Helper class to build HTML string
 *
 * Usage :
 * $html = new HtmlTag('script');
 * $html->addAttribute('src', 'http://...');
 * $output = (string) $html;
 *
 * $html = new HtmlTag('p', 'Some Lorem Ipsum Dolores');
 * $output = (string) $html;
 *
 * @author Anthony Pauwels <hello@anthonypauwels.be>
 * @package Pangu\Common
 */
class Html
{
    use HtmlAttributes;

    /** @var string */
    protected $tagName;
    /** @var bool */
    protected $closable = false;
    /** @var string */
    protected $content = '';

    /**
     * Html constructor
     *
     * @param string $tag_name
     * @param null|string $content
     * @param null|bool $closable
     */
    public function __construct(string $tag_name, ?string $content = null, ?bool $closable = null)
    {
        $this->tagName = $tag_name;

        if ( !empty( $content ) ) {
            $this->content( $content );

            $closable = true; /** tags with content are basically closable */
        }

        if ( is_bool( $closable ) ) {
            $this->closable = $closable;
        } else {
            switch ( $tag_name ) {
                /** list of basic no-closable tags */
                /** @see : http://xahlee.info/js/html5_non-closing_tag.html */
                case 'area':
                case 'base':
                case 'br':
                case 'col':
                case 'embed':
                case 'hr':
                case 'input':
                case 'keygen':
                case 'link':
                case 'meta':
                case 'param':
                case 'source':
                case 'track':
                case 'wbr':
                    $this->closable = false;
                    break;

                /** all others tags are closable like div, span, custom tags, etc */
                default:
                    $this->closable = true;
            }
        }

    }

    /**
     * Create a tag and return it as HTML string
     *
     * @param string $tag_name
     * @param string|null $content
     * @param bool|null $closable
     * @param array $attributes
     * @return string
     */
    public static function tag(string $tag_name, ?string $content = null, ?bool $closable = null, array $attributes = []):string
    {
        return ( new self( $tag_name, $content, $closable ) )->addAttributes( $attributes )->toHtml();
    }

    /**
     * Set the content between opening and closing tags
     *
     * @param string $content
     * @return $this
     */
    public function content(string $content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Prepend content to existing content
     *
     * @param string $content
     * @return $this
     */
    public function prepend(string $content)
    {
        $this->content = $content . $this->content;

        return $this;
    }

    /**
     * Append content to existing content
     *
     * @param string $content
     * @return $this
     */
    public function append(string $content)
    {
        $this->content = $this->content . $content;

        return $this;
    }

    /**
     * Determine if the Html is empty
     *
     * @return bool
     */
    public function isEmpty():bool
    {
        return $this->content === '';
    }

    /**
     * Return the Html tag
     *
     * @return string
     */
    public function toHtml():string
    {
        $html = '<' . $this->tagName . $this->buildHtmlAttributes();

        if ( $this->closable ) {
            $html.= '>' . $this->content . '</' . $this->tagName . '>';
        } else {
            $html.= ' />';
        }

        return $html;
    }

    /**
     * HtmlTag objects can be used as string element
     *
     * @return string
     */
    public function __toString()
    {
        return $this->toHtml();
    }
}