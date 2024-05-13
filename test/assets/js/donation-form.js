// Function to handle form submission
function submitForm() {
    // Get the selected contribution type
    var selectedContribution = document.querySelector('.give-donation-amount span.active').getAttribute('id');
    console.log("client message --> ",selectedContribution)
    // Set the action URL based on the selected contribution type
    var actionUrl;
    if (selectedContribution === 'talentButton') {
        actionUrl = 'contribute-talent.php';
    } else if (selectedContribution === 'timeButton') {
        actionUrl = 'contribute-time.php';
    } else {
        // Default action for financial contribution
        actionUrl = '';
    }

    // Set the action attribute of the form
    document.getElementById('contributionForm').setAttribute('action', actionUrl);
}

// Event listener for form submission
document.getElementById('contributionForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent default form submission behavior
    submitForm(); // Call the function to set the action URL
    this.submit(); // Submit the form
});