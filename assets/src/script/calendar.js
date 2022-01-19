import { Calendar } from 'calendar/lib/calendar';

const cal = new Calendar(0);
const calendarBody = document.querySelector('.calendar-body');
const calendarMonthYear = document.querySelector('.calendar-month-year');
const selectedDate = new Date();

if (calendarBody) {
  renderCalendarMonth();
  document.querySelector('.calendar-next').addEventListener('click', () => {navigateMonth(1)})
  document.querySelector('.calendar-prev').addEventListener('click', () => {navigateMonth(-1)})
}

function navigateMonth(increment) {
  selectedDate.setMonth(selectedDate.getMonth() + increment);
  selectedDate.setHours(0, 0, 0, 0);
  renderCalendarMonth();
}

function renderCalendarMonth() {
  calendarMonthYear.textContent = `
    ${
      [
        "January", "February", "March",
        "April", "May", "June", "July",
        "August", "September", "October",
        "November", "December"
      ]
      [selectedDate.getMonth()]
    } ${selectedDate.getFullYear()}`;
  
  let weeksDays = cal.monthDays(selectedDate.getFullYear(), selectedDate.getMonth());
  calendarBody.innerHTML = '';
  
  for (let j = 0; j < weeksDays.length; j++) {
    const row = calendarBody.appendChild(document.createElement('tr'));
    for (let i = 0; i < weeksDays[j].length; i++) {
      const cell = row.appendChild(document.createElement('td'));
      if (weeksDays[j][i]) {
        cell.innerHTML = `<h3 class="text-center">${weeksDays[j][i]}</h3>`;
        events.forEach(event => {
          const eventDate = new Date(event.date);
          const calDate = new Date(selectedDate.getFullYear(), selectedDate.getMonth(), weeksDays[j][i]);
          if (eventDate.getTime() == calDate.getTime()) {
            cell.innerHTML += `<a class="px-2 text-center block" href="${event.link}">${event.title}</a>`;
          }
        });
      } else {
        cell.classList.add('invisible');
      }
    }
  };
}
