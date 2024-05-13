document.addEventListener('DOMContentLoaded', function() {
    
    // Buttons
    const talentButton = document.getElementById('talentButton');
    const timeButton = document.getElementById('timeButton');
    const financialButton = document.getElementById('financialButton');

    // Sections
    const talentSection = document.getElementById('talentSection');
    const financialSection = document.getElementById('financialSection');
    const timeSection = document.getElementById('timeSection');

    // Talent
    talentButton.addEventListener('click', () => {
        talentSection.classList.remove('hidden');
        financialSection.classList.add('hidden');
        timeSection.classList.add('hidden');
    });
    
    // Financial
    financialButton.addEventListener('click', () => {
        financialSection.classList.remove('hidden');
        talentSection.classList.add('hidden');
        timeSection.classList.add('hidden');
    });
    
    // Time
    timeButton.addEventListener('click', () => {
        timeSection.classList.remove('hidden');
        talentSection.classList.add('hidden');
        financialSection.classList.add('hidden');
    });
});
