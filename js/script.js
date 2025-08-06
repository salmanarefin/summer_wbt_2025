
function checkReason() {
    var wantToContact = prompt("Do you want to contact? (yes/no)");

    if (wantToContact === "yes") {
        var reason = prompt("Why do you want to contact? (job/project/support/other)");

        if (reason === "job") {
            alert("Thanks for your interest in a job opportunity!");
        } else if (reason === "project") {
            alert("Great! Let’s talk about your project.");
        } else if (reason === "support") {
            alert("Support team will reach out to you soon.");
        } else if (reason === "other") {
            alert("Please provide more details.");
        } else {
            alert("Reason not recognized. Please try again.");
            return;
        }

        var time = prompt("What time would you prefer to be contacted? (e.g., 3 PM, tomorrow 10 AM)");

        if (time) {
            alert("You selected: " + reason + "\nPreferred time: " + time);
        } else {
            alert("No time selected.");
        }

    } else if (wantToContact === "no") {
        alert("Okay, feel free to reach out anytime!");
    } else {
        alert("Please answer with 'yes' or 'no'.");
    }
}
