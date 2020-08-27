const showDropdown = () => {
  let element = document.querySelector(".dropdown-sidenav"),
    elementTwo = document.querySelector("#admin-panel-a");
  element.classList.toggle("dropdown-show");
  elementTwo.classList.toggle("border-top-a");
};
const showComplaintTypeDropdown = () => {
  let element = document.querySelector("#complaint-type");
  element.classList.toggle("show-category-dropdown");
};
const showSubComplaintTypeDropdown = () => {
  let element = document.querySelector("#sub-complaint-type");
  element.classList.toggle("show-category-dropdown");
};
const showGenderDropdown = () => {
  let element = document.querySelector("#gender");
  element.classList.toggle("show-category-dropdown");
};
const showAgeDropdown = () => {
  let element = document.querySelector("#age");
  element.classList.toggle("show-category-dropdown");
};
function checkDelete() {
  return confirm("Are you sure you want to Delete?");
}

// document.getElementById("myAnchor").href = "http://www.cnn.com/";
const searchUser = () => {
  alert("searched");
};
