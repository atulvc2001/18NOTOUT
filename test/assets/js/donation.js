document.addEventListener('DOMContentLoaded', function() {
    const talentButton = document.getElementById('talentButton');
    const financialButton = document.getElementById('financialButton');
    const talentSection = document.getElementById('talentSection');
    const financialSection = document.getElementById('financialSection');

    talentButton.addEventListener('click', () => {
        talentSection.classList.remove('hidden');
        financialSection.classList.add('hidden');
    });

    financialButton.addEventListener('click', () => {
        talentSection.classList.add('hidden');
        financialSection.classList.remove('hidden');
    });
});
