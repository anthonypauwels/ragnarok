export default function (nbr, thousandsSeparator = ' ', decimalSeparator = ',', decimal = 2)
{
    return parseFloat( nbr ).toFixed( parseInt( decimal ) ).replace( '.', decimalSeparator ).replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1' + thousandsSeparator );
}
