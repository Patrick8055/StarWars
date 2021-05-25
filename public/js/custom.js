function search() {
    let input, filter, ul, li, a, p, i, aTxt, pTxt;
    input = document.getElementById("searchInput");
    filter = input.value.toUpperCase();
    ul = document.getElementById("filmList");
    li = ul.getElementsByTagName("li");
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        p =li[i].getElementsByTagName("p")[0];
        aTxt = a.textContent || a.innerText;
        pTxt = p.textContent || p.innerText;
        if (aTxt.toUpperCase().indexOf(filter) > -1 || pTxt.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
}
