// const floatingButton = document.getElementById('floating-button');
// let isDragging = false;
// let offsetX, offsetY;
// let defaultPositionX = window.innerWidth - 100; // 20px padding + 56px button width
// let defaultPositionY = window.innerHeight - 200; // 20px padding + 56px button height

// // Set the initial position of the floating button
// floatingButton.style.transform = `translate(${defaultPositionX}px, ${defaultPositionY}px)`;

// // Mouse down event: Start dragging the button
// floatingButton.addEventListener('mousedown', (event) => {
//     isDragging = true;
//     offsetX = event.offsetX;
//     offsetY = event.offsetY;
// });

// // Mouse move event: Move the button if dragging is true
// document.addEventListener('mousemove', (event) => {
//     if (isDragging) {
//         const mouseX = event.pageX - offsetX;
//         const mouseY = event.pageY - offsetY;
//         floatingButton.style.transform = `translate(${mouseX}px, ${mouseY}px)`;
//     }
// });

// // Mouse up event: Stop dragging the button
// document.addEventListener('mouseup', () => {
//     if (isDragging) {
//         isDragging = false;
//     } else {
//         floatingButton.style.transform = `translate(${defaultPositionX}px, ${defaultPositionY}px)`;
//     }
// });

// // Ensure the button resets to its default position when the window is resized
// window.addEventListener('resize', () => {
//     defaultPositionX = window.innerWidth - 76; // 20px padding + 56px button width
//     defaultPositionY = window.innerHeight - 76; // 20px padding + 56px button height
//     if (!isDragging) {
//         floatingButton.style.transform = `translate(${defaultPositionX}px, ${defaultPositionY}px)`;
//     }
// });


// buy now button 

document.addEventListener("DOMContentLoaded", () => {
    const buyNowButtons = document.querySelectorAll("button");
  
    buyNowButtons.forEach(button => {
      button.addEventListener("click", () => {
        window.location.href = "addtocart.php";
      });
    });
  });
  