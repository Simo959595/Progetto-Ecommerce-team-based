document.addEventListener("DOMContentLoaded", function () {
    let navbar = document.querySelector("#navbar");
    let navElements = document.querySelectorAll(".navElement");
    let inputSearch = document.querySelector("#inputSearch");
    let inputSearch1 = document.querySelector("#inputSearch1");
    let header = document.querySelector("#header");
    let search = document.querySelector("#search");

    if (header) {
        window.addEventListener("scroll", function () {
            if (window.scrollY > (header.clientHeight - 10)) {
                navElements.forEach(navElements => {
                    //aggiuinge alle scritte colore blu
                    navElements.classList.add("col-b-text");
                    //toglie alle scrittecolore bianco
                    navElements.classList.remove("col-bg-text");
                });
                //aggiunge alla navbar ombreggiatura e colore sfondo bianco
                navbar.classList.add("col-bg", "shadow");
                inputSearch.classList.remove("search-border-home");
                inputSearch.classList.add("search-border-all");
                inputSearch1.classList.remove("search-border-home");
                inputSearch1.classList.add("search-border-all");
                // search.classList.add("col-b-text");
                // search.classList.remove("col-bg-text");
            } else {
                navElements.forEach(navElements => {
                    //aggiunge colore bianco
                    navElements.classList.add("col-bg-text");
                    //rimuove colore blu
                    navElements.classList.remove("col-b-text");
                });
                //rimuove ombra e colore sfondo bianco
                navbar.classList.remove("col-bg", "shadow");
                inputSearch.classList.remove("search-border-all");
                inputSearch.classList.add("search-border-home");
                inputSearch1.classList.remove("search-border-all");
                inputSearch1.classList.add("search-border-home");
                // search.classList.remove("col-b-text");
                // search.classList.add("col-bg-text");
            }
        });
    }
});


document.querySelectorAll('.carousel').forEach(carousel => {
    carousel.addEventListener('mouseenter', () => {
        var carouselInstance = new bootstrap.Carousel(carousel, {
            interval: 2000, // Tempo di auto avanzamento (2000ms = 2 secondi)
        });
        carouselInstance.cycle(); // Avvia l'auto avanzamento
    });

    carousel.addEventListener('mouseleave', () => {
        var carouselInstance = new bootstrap.Carousel(carousel, {
            interval: false // Disabilita l'auto avanzamento
        });
        carouselInstance.pause(); // Ferma l'auto avanzamento
    });
});

//rotazione bottone navbar mobile
let navButton = document.querySelector("#navButton");
// let rotatedIcon = document.querySelector(".bi-chevron-double-up");

navButton.addEventListener('click', function () {
    navButton.classList.toggle('rotated1');
    navButton.classList.toggle('rotated2');
});

