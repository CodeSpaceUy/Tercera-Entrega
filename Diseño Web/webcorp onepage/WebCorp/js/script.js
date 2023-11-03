var prevScrollpos = window.pageYOffset;

window.onscroll = function() {
    var currentScrollPos = window.pageYOffset;
    if (prevScrollpos > currentScrollPos) {
        document.getElementById("miCabecera").style.top = "0";
    } else {
        document.getElementById("miCabecera").style.top = "-200px";
    }
    prevScrollpos = currentScrollPos;
}
function scrollToSection(e) {
    e.preventDefault();

    const targetId = this.getAttribute("href").substring(1);
    const targetSection = document.getElementById(targetId);

    try {
        window.scrollTo({
            top: targetSection.offsetTop,
            behavior: "smooth"
        });
    } catch (error) {
        console.error('Error:', error);
    }
}