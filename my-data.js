function saveProfile() {
    const name = document.getElementById('userName').value;
    const email = document.getElementById('userEmail').value;
    localStorage.setItem('userName', name);
    localStorage.setItem('userEmail', email);
    alert('Profile saved!');
}

function loadProfile() {
    // Load name & email
    const name = localStorage.getItem('userName') || '';
    const email = localStorage.getItem('userEmail') || '';
    document.getElementById('userName').value = name;
    document.getElementById('userEmail').value = email;

    // Calculate points: money donated + items donated
    const moneyDonated = parseFloat(localStorage.getItem('moneyDonated')) || 0;
    const itemsDonated = parseInt(localStorage.getItem('itemsDonated')) || 0;
    const totalPoints = moneyDonated + itemsDonated;
    const timeDonated = parseInt(localStorage.getItem('timeDonated')) || 0;

    document.getElementById('totalPoints').textContent = totalPoints;
    document.getElementById('timeDonated').textContent = timeDonated;
}

window.onload = loadProfile;