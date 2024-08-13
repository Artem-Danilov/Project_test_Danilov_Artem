$(document).ready(function() {
	var emailInput = document.getElementById('email');
	var addressInput = document.getElementById('address');
	var phoneInput = document.getElementById('phone');

	$("#phone").inputmask({ 
			mask: "+7 (999) 999 - 99 - 99",
			placeholder: " ",
			oncomplete: function() {
					phoneInput.setCustomValidity("")
			},
			onincomplete: function() {
					phoneInput.setCustomValidity("Введите корректный номер телефона. Например, +7 (999) 999 - 99 - 99");
			},
			oncleared: function() {
					phoneInput.setCustomValidity("");
			}
	});

	emailInput.addEventListener('input', function() {
			var currentValue = emailInput.value.trim();
			var emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

			if (!emailPattern.test(currentValue) && currentValue.length > 0) {
					emailInput.setCustomValidity("Введите корректный адрес электронной почты. Например, user@example.com");
					errorMessageEmail.textContent = "Введите корректный адрес электронной почты. Например, user@example.com";
			} else {
					emailInput.setCustomValidity("");
			}
	});

	// Валидация адреса
	addressInput.addEventListener('input', function() {
			var currentValue = addressInput.value.trim();
			var addressPattern = /^г\.\s*\p{L}+, ул\. [\p{L}\d\s]+(?: \d+[А-Я]?(?:, кв\.\s*\d+)?|, кв\.\s*\d+)?$/u;

			if (!addressPattern.test(currentValue) && currentValue.length > 0) {
					addressInput.setCustomValidity("Введите корректный адрес. Например, г. Тула, ул. Седова 14 А, кв. 53");
			} else {
					addressInput.setCustomValidity("");
			}
	});

	$("#contactForm").on('submit', function(event) {
			var phoneNumber = phoneInput.value.replace(/\D/g, '');

			// Проверяем длину номера телефона
			if (phoneNumber.length !== 11) {
					phoneInput.setCustomValidity("Введите корректный номер телефона. Например, +7 (999) 999 - 99 - 99");
					event.preventDefault();
			} else {
					phoneInput.setCustomValidity("");
			}
			phoneInput.reportValidity();
	});

	// Скрытие и отображение таблицы
	document.getElementById('hideTableButton').addEventListener('click', function() {
			document.getElementById('feedbackTable').style.display = 'none';
			this.style.display = 'none';
			document.getElementById('showTableButton').style.display = 'inline-block';
	});

	document.getElementById('showTableButton').addEventListener('click', function() {
			document.getElementById('feedbackTable').style.display = 'table';
			this.style.display = 'none';
			document.getElementById('hideTableButton').style.display = 'inline-block';
	});
});
