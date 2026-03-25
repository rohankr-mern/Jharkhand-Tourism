document.addEventListener("DOMContentLoaded", function () {
    const hamburger = document.getElementById("hamburger");
    const navbar = document.getElementById("navbar");

    hamburger.addEventListener("click", function () {
        navbar.classList.toggle("active");
    });
});

window.addEventListener('scroll', function() {
    const topHeader = document.querySelector('.top-header');
    if (window.scrollY > 50) {   // after scrolling 50px
        topHeader.classList.add('shrink');
    } else {
        topHeader.classList.remove('shrink');
    }
});

let cards = document.querySelectorAll('#cards-container .card.hidden');
let loadMoreBtn = document.getElementById('.loadMore');
let showCount = 3;

loadMoreBtn.addEventListener('click', () => {
    for(let i=0; i<showCount && cards.length>0; i++){
        cards[0].classList.remove('hidden');
        cards = document.querySelectorAll('#cards-container .card.hidden');
    }
    if(cards.length === 0){
        loadMoreBtn.style.display = 'none';
    }
});

//SIGN UP
function openPopup() {
      document.getElementById("signupPopup").style.display = "flex";
    }

    function closePopup() {
      document.getElementById("signupPopup").style.display = "none";
    }