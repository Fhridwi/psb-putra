const sidebar = document.getElementById('sidebar');
const toggleButton = document.getElementById('toggle-btn');

toggleButton.addEventListener('click', () => {
    const isOpen = sidebar.classList.toggle('open');
    toggleButton.classList.toggle('open', isOpen);
});

function openModal() {
    document.getElementById('accountModal').classList.remove('hidden');
}

function closeModal() {
    document.getElementById('accountModal').classList.add('hidden');
}

document.getElementById('terms').addEventListener('change', function() {
    document.getElementById('submitBtn').disabled = !this.checked;
});