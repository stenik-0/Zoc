/*---- Waypoints ---- */
const waypoint = new Waypoint({
  element: document.querySelector(".section-about"),
  handler: function (direction) {
    const nav = document.querySelector("nav");
    if (direction === "down") {
      nav.classList.add("sticky");
    } else {
      nav.classList.remove("sticky");
    }
  },
  offset: "60px",
});

/* ----- MOBILE MENU ----- */

$(document).ready(function () {
  $(".mobile-nav-icon").click(function () {
    const nav = $(".main-nav");
    let icon = $(".mobile-nav-icon i");
    nav.slideToggle(200);

    if (icon.hasClass("ion-navicon-round")) {
      icon.addClass("ion-close-round");
      icon.removeClass("ion-navicon-round");
    } else {
      icon.addClass("ion-navicon-round");
      icon.removeClass("ion-close-round");
    }
  });
});
