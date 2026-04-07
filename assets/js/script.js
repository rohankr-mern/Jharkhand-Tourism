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

// loadMoreBtn.addEventListener('click', () => {
//     for(let i=0; i<showCount && cards.length>0; i++){
//         cards[0].classList.remove('hidden');
//         cards = document.querySelectorAll('#cards-container .card.hidden');
//     }
//     if(cards.length === 0){
//         loadMoreBtn.style.display = 'none';
//     }
// });

//SIGN UP
function openPopup() {
      document.getElementById("signupPopup").style.display = "flex";
    }

    function closePopup() {
      document.getElementById("signupPopup").style.display = "none";
    }

// OMMENT LOGIC

// ➕ Add Comment
function addComment() {
  let name = document.getElementById("name").value;
  let comment = document.getElementById("commentText").value;
  let rating = document.getElementById("rating").value;

  let formData = new FormData();
  formData.append("name", name);
  formData.append("comment", comment);
  formData.append("rating", rating);

  fetch("add_comment.php", {
    method: "POST",
    body: formData
  })
  .then(res => res.text())
  .then(data => {
    if(data === "success") {
      loadComments();
    }
  });
}

// 📥 Load Comments
function loadComments() {
  fetch("./frontend/get_comments.php")
  .then(res => res.json())
  .then(data => {
    let slider = document.getElementById("commentSlider");
    slider.innerHTML = "";

    data.forEach(c => {
      let stars = "⭐".repeat(c.rating);

      slider.innerHTML += `
        <div class="comment-card">
          <img src="https://i.pravatar.cc/40">
          <h4>${c.name}</h4>
          <div class="stars">${stars}</div>
          <p>${c.comment}</p>
        </div>
      `;
    });
  });
}

// 🔄 Auto load
loadComments();


