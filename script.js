// Select popups and icons
const alcoholIcon = document.getElementById('alcoholIcon');
const school_stressIcon = document.getElementById('school_stressIcon');

// Select the corresponding popups
const alcoholPopup = document.getElementById('alcoholPopup');
const school_stressPopup = document.getElementById('school_stressPopup');

// Select the close buttons within the popups
const closeAlcoholPopup = alcoholPopup.querySelector('.close');
const closeSchoolStressPopup = school_stressPopup.querySelector('.close');

// Show the alcohol popup when the icon is clicked
alcoholIcon.onclick = function() {
    alcoholPopup.style.display = 'block';
}

// Show the school stress popup when the icon is clicked
school_stressIcon.onclick = function() {
    school_stressPopup.style.display = 'block';
}

// Close the alcohol popup when the close button is clicked
closeAlcoholPopup.onclick = function() {
    alcoholPopup.style.display = 'none';
}

// Close the school stress popup when the close button is clicked
closeSchoolStressPopup.onclick = function() {
    school_stressPopup.style.display = 'none';
}

// Close the popups when clicking outside of them
window.onclick = function(event) {
    if (event.target == alcoholPopup) {
        alcoholPopup.style.display = 'none';
    }
    if (event.target == school_stressPopup) {
        school_stressPopup.style.display = 'none';
    }
}