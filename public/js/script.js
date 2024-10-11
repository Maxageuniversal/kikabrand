

window.addEventListener('load', function() {
    setTimeout(function() {
        document.getElementById('splash-screen').style.display = 'none'; // Hide the splash screen
    }, 3000); // Adjust the time (5000ms = 5 seconds)
});



function toggleMenu() {
    const header = document.getElementById('header');
    header.classList.toggle('menu-open');
}


    function toggleMobileMenu() {
        var mobileMenu = document.getElementById('mobile-menu');
        if (mobileMenu.style.display === "block") {
            mobileMenu.style.display = "none";
        } else {
            mobileMenu.style.display = "block";
        }
    }



function openModal(product, imagePath) {
    const modal = document.getElementById("colorModal");
    const colorOptions = document.getElementById("colorOptions");
    const productImage = document.getElementById("productImage");

    // Set product image
    productImage.src = imagePath;

    // Clear previous options
    colorOptions.innerHTML = '';

  // Example color options, you can replace with actual colors
  const colors = ['Red', 'Blue', 'Green', 'Yellow'];
  colors.forEach(color => {
      const colorDiv = document.createElement('div');
      colorDiv.className = 'color-option'; // Use the new class for circular style
      colorDiv.style.backgroundColor = color.toLowerCase(); // Set background color
      colorDiv.onclick = () => selectColor(color);
      colorOptions.appendChild(colorDiv);
  });

    modal.style.display = "block";
}

function closeModal() {
    const modal = document.getElementById("colorModal");
    modal.style.display = "none";
}

function selectColor(color) {
    alert(`Selected Color: ${color}`);
}

function buyNow() {
    alert('Proceeding to buy now!');
    closeModal();
}

function addToCart() {
    alert('Added to cart!');
    closeModal();
}

function viewImage() {
    const largeImageModal = document.getElementById("imageModal");
    const productImage = document.getElementById("productImage");
    const largeProductImage = document.getElementById("largeProductImage");

    // Set large image source to the same as product image
    largeProductImage.src = productImage.src;
    largeImageModal.style.display = "block";
}

function closeImageModal() {
    const largeImageModal = document.getElementById("imageModal");
    largeImageModal.style.display = "none";
}

// Close the modal when clicking outside of it
window.onclick = function(event) {
    const colorModal = document.getElementById("colorModal");
    const imageModal = document.getElementById("imageModal");
    if (event.target == colorModal) {
        colorModal.style.display = "none";
    } else if (event.target == imageModal) {
        imageModal.style.display = "none";
    }
}


document.addEventListener("DOMContentLoaded", function () {
    setTimeout(function () {
        // Hide the splash screen
        document.getElementById('splash-screen').style.display = 'none';
        // Show the home page
        document.getElementById('home-page').style.display = 'block';
        // Enable scrolling once the home page is visible
        document.body.style.overflow = 'auto';
    }, 3000); // 3 seconds delay
});
