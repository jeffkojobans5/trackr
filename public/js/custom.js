// greetings
let greet = document.getElementById('greetings')
const time = new Date().getHours();

if (time < 10) {
  greet.innerHTML = "Good morning";
} else if (time < 20) {
  greet.innerHTML = "Good Afternoon";
} else {
  greet.innerHTML = "Good evening";
}
