$(".navbar-hide-on-scroll.fixed-top").headroom({
  offset: 205,
  tolerance: 5,
  classes: {
    // when element is initialised
    initial: "headroom",
    // when scrolling up
    pinned: "headroom--pinned-top",
    // when scrolling down
    unpinned: "headroom--unpinned-top"
  }
});
