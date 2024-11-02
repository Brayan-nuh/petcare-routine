document.querySelector('.search-button').addEventListener('click', function() {
    const query = document.querySelector('.search-bar input').value;
    alert(`You searched for: ${query}`);
    // Here you can implement actual search functionality
});
//tab script
function showContent(sectionId) {
    // Hide all tab content
    const tabs = document.querySelectorAll('.tab-content');
    tabs.forEach(tab => tab.classList.remove('active'));

    // Show the selected tab content
    document.getElementById(sectionId).classList.add('active');
}
