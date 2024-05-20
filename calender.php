<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Calendar</title>
  <link rel="stylesheet" href="style.css" />
  <style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap");

    .calendar {
      margin: auto;
      width: 98%;
      max-width: 380px;
      padding: 1rem;
      background: #fff;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    }

    .calendar header {
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .calendar nav {
      display: flex;
      align-items: center;
    }

    .calendar ul {
      list-style: none;
      display: flex;
      flex-wrap: wrap;
      text-align: center;
    }

    .calendar ul li {
      width: calc(100% / 7);
      margin-top: 25px;
      position: relative;
      z-index: 2;
    }

    #prev,
    #next {
      width: 20px;
      height: 20px;
      position: relative;
      border: none;
      background: transparent;
      cursor: pointer;
    }

    #prev::before,
    #next::before {
      content: "";
      width: 50%;
      height: 50%;
      position: absolute;
      top: 50%;
      left: 50%;
      border-style: solid;
      border-width: 0.25em 0.25em 0 0;
      border-color: #ccc;
    }

    #next::before {
      transform: translate(-50%, -50%) rotate(45deg);
    }

    #prev::before {
      transform: translate(-50%, -50%) rotate(-135deg);
    }

    #prev:hover::before,
    #next:hover::before {
      border-color: #000;
    }

    .days {
      font-weight: 600;
    }

    .dates li.today {
      color: #fff;
    }

    .dates li.today::before {
      content: "";
      width: 2rem;
      height: 2rem;
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      background: #000;
      border-radius: 50%;
      z-index: -1;
    }

    .dates li.inactive {
      color: #ccc;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      font-family: Arial, sans-serif;
    }

    th,
    td {
      padding: 8px;
      text-align: left;
      border-bottom: 1px solid #ddd;
      border-right: 1px solid #ddd;
      /* Add this line */
    }

    th {
      background-color: #4CAF50;
      color: white;
    }

    tr:nth-child(even) {
      background-color: #f2f2f2;
    }
  </style>
</head>

<body>
  <?php include('include/header.php')?>
  <section class="skill pb-0">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h2> Academic calendar :-Key Dates, Deadlines, and Important Events</h2>
          <p>The academic calendar is a meticulously planned schedule that outlines the key dates and events for the
            academic year, serving as an essential guide for students, faculty, and staff. It includes the start and end
            dates for each semester, registration periods, deadlines for adding or dropping courses, and final
            examination schedules.</p>
        </div>
      </div>
    </div>
  </section>
  <div class="container">
    <div class="row">
      <div class="col-lg-6">
        <div class="calendar mb-5 mt-3">
          <header>
            <h3></h3>
            <nav>
              <button id="prev"></button>
              <button id="next"></button>
            </nav>
          </header>
          <section>
            <ul class="days">
              <li>Sun</li>
              <li>Mon</li>
              <li>Tue</li>
              <li>Wed</li>
              <li>Thu</li>
              <li>Fri</li>
              <li>Sat</li>
            </ul>
            <ul class="dates"></ul>
          </section>
        </div>
      </div>
      <div class="col-lg-6">
        <table>
          <tr>
            <th>S.No.</th>
            <th>Particulars of Events</th>
            <th>Date</th>
          </tr>
          <tr>
            <td>1</td>
            <td>Semester Commencement Meet/Faculty Semester Induction & Orientation</td>
            <td>25.01.2024</td>
          </tr>
          <tr>
            <td>2</td>
            <td>Republic Day</td>
            <td>26.01.2024</td>
          </tr>
          <tr>
            <td>3</td>
            <td>Registration of Live Semester</td>
            <td>27.01.2024 to 28.01.2024</td>
          </tr>
          <tr>
            <td>4</td>
            <td>Commencement of the Classes</td>
            <td>29.01.2024</td>
          </tr>
          <tr>
            <td>5</td>
            <td>Registration with Late Fee</td>
            <td>29.01.2024 Onwards</td>
          </tr>
          <tr>
            <td>7</td>
            <td>Maha Shivratri</td>
            <td>08.03.2024</td>
          </tr>


        </table>
      </div>
    </div>
  </div>
  <?php include('include/footer.php')?>
  <script>
    const header = document.querySelector(".calendar h3");
    const dates = document.querySelector(".dates");
    const navs = document.querySelectorAll("#prev, #next");

    const months = [
      "January",
      "February",
      "March",
      "April",
      "May",
      "June",
      "July",
      "August",
      "September",
      "October",
      "November",
      "December",
    ];

    let date = new Date();
    let month = date.getMonth();
    let year = date.getFullYear();

    function renderCalendar() {
      const start = new Date(year, month, 1).getDay();
      const endDate = new Date(year, month + 1, 0).getDate();
      const end = new Date(year, month, endDate).getDay();
      const endDatePrev = new Date(year, month, 0).getDate();

      let datesHtml = "";

      for(let i = start; i > 0; i--) {
        datesHtml += `<li class="inactive">${endDatePrev - i + 1}</li>`;
      }

      for(let i = 1; i <= endDate; i++) {
        let className =
          i === date.getDate() &&
            month === new Date().getMonth() &&
            year === new Date().getFullYear()
            ? ' class="today"'
            : "";
        datesHtml += `<li${className}>${i}</li>`;
      }

      for(let i = end; i < 6; i++) {
        datesHtml += `<li class="inactive">${i - end + 1}</li>`;
      }

      dates.innerHTML = datesHtml;
      header.textContent = `${months[month]} ${year}`;
    }

    navs.forEach((nav) => {
      nav.addEventListener("click", (e) => {
        const btnId = e.target.id;

        if(btnId === "prev" && month === 0) {
          year--;
          month = 11;
        } else if(btnId === "next" && month === 11) {
          year++;
          month = 0;
        } else {
          month = btnId === "next" ? month + 1 : month - 1;
        }

        date = new Date(year, month, new Date().getDate());
        year = date.getFullYear();
        month = date.getMonth();

        renderCalendar();
      });
    });

    renderCalendar();
  </script>
</body>

</html>