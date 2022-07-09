/**
 * @example
 *
 * @param string
 * @returns HTMLElement
 */
export default function (string)
{
    const div = document.createElement("div");
    div.innerHTML = string;

    return div.childNodes[0] ? div.childNodes[0] : div.childNodes ;
};
