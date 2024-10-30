const personalInfo = document.querySelector('.personal-info');
const accountDetail = document.querySelector('.account-detail');
const additionalInfo = document.querySelector('.additional-info');
const personalInfoPanel = document.querySelector('.personal-info-panel');
const accountDetailPanel = document.querySelector('.account-details-panel');
const additionalInfoPanel = document.querySelector('.additional-info-panel');

function validateForm(tabName) {
  const requiredFields = document.querySelectorAll(`.${tabName} [required]`);
  let isValid = true;
  requiredFields.forEach(field => {
    if (!field.checkValidity()) {
      field.classList.add('error');
      isValid = false;
    } else {
      field.classList.remove('error');
    }
  });
  return isValid;
}


// function untuk pindah tab
function openTab( tabName) {
  if (tabName === 'AccountDetails' && !validateForm('personal-info')) return;
  if (tabName === 'AdditionalInfo' && !validateForm('account-detail')) return;

  personalInfoPanel.classList.remove('bg-white', 'text-black');
  accountDetailPanel.classList.remove('bg-white', 'text-black');
  additionalInfoPanel.classList.remove('bg-white', 'text-black');

  switch (tabName) {
    case 'PersonalInfo':
      personalInfoPanel.classList.add('bg-white', 'text-black');
      personalInfo.style.display = 'block';
      accountDetail.style.display = 'none';
      additionalInfo.style.display = 'none';
      break;
    case 'AccountDetails':
      accountDetailPanel.classList.add('bg-white', 'text-black');
      console.log('b');
      accountDetail.style.display = 'block';
      personalInfo.style.display = 'none';
      additionalInfo.style.display = 'none';

      break;
    case 'AdditionalInfo':
      additionalInfoPanel.classList.add('bg-white', 'text-black');
      console.log('c');
      additionalInfo.style.display = 'block';
      accountDetail.style.display = 'none';
      personalInfo.style.display = 'none';
      break;

    default:
      break;
  }
}


openTab('PersonalInfo');