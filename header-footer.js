// Function to include header and footer
function headerFooter() {
    const header = document.querySelector('header');
    const footer = document.querySelector('footer');

    fetch('header.html')
        .then(response => response.text())
        .then(data => {
            header.innerHTML = data;
        });

    fetch('footer.html')
        .then(response => response.text())
        .then(data => {
            footer.innerHTML = data;
        });
}

// Call the function to include header and footer
headerFooter();
