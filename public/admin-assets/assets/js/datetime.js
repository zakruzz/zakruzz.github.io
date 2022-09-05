var d = new Date();
var months = [
    "Januari", "Febuari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"
];
var days = [
    "Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"
];

document.getElementById("time").innerHTML = d.getHours() + ":" + d.getMinutes();
document.getElementById("date").innerHTML = days[d.getDay()] + ", " + d.getDate() + " " + months[d.getMonth()] + " " + d.getFullYear();

if (d.getHours() >= 19) {
    document.getElementById("txt-greet").innerHTML = "Selamat Malam";
} else if (d.getHours() >= 15) {
    document.getElementById("txt-greet").innerHTML = "Selamat Sore";
} else if (d.getHours() >= 10) {
    document.getElementById("txt-greet").innerHTML = "Selamat Siang";
} else if (d.getHours() >= 0) {
    document.getElementById("txt-greet").innerHTML = "Selamat Pagi";
} else {
    document.getElementById("txt-greet").innerHTML = "Selamat Datang";
}
