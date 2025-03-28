document.querySelectorAll(".dropdown-item").forEach(function (item) {
    item.addEventListener("click", function () {
        var value = this.getAttribute("data-value");
        document.getElementById("hiddenJenisComplainInput").value = value;
        document.getElementById("jenisComplainDropdown").innerText = value;
    });
});

// $(document).ready(function () {
//     $(".dropdown-item").click(function () {
//         var value = $(this).attr("data-value"); // Mendapatkan nilai dari atribut data-value
//         console.log(value);
//         $("#hiddenJenisComplainInput").val(value); // Mengatur nilai input tersembunyi
//         $("#jenisComplainDropdown .no-icon").text($(this).text()); // Mengatur teks dropdown
//     });
// });
