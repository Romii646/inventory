document.addEventListener("DOMContentLoaded", function () {
  // Listen for the formReady event and react when the rental form is built
  document.addEventListener("formReady", function (e) {
    if (e.detail && e.detail.table === "rental") {
      console.debug(
        "rentalCyberScript: formReady received for",
        e.detail.table,
      );
      // Add any rental-specific wiring here (if needed in the future)
    }
  });
});
