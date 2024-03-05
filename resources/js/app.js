import './bootstrap';

const searchForm = document.getElementById('hotel-search-form');
const searchResults = document.getElementById('search-results');

searchForm.addEventListener('submit', (event) => {
  event.preventDefault(); // Prevent default form submission

  const destination = document.getElementById('destination').value;
  const guest = document.getElementById('guest').value;
  const checkInDate = document.getElementById('check-in-date').value;
  const checkOutDate = document.getElementById('check-out-date').value;

  // Validate inputs (add checks for emptiness, date validity, etc.)
  if (!destination || !checkInDate || !checkOutDate) {
    alert('Please fill in all required fields.');
    return;
  }

  // Clear any previous search results
  searchResults.innerHTML = '';

  // Replace with your preferred API call (e.g., using Fetch or Axios)
  fetch('https://example-hotel-api.com/hotels', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify({
      destination,
      checkInDate,
      checkOutDate
    })
  })
  .then(response => response.json())
  .then(data => {
    if (data.error) {
      searchResults.innerHTML = `<p class="text-danger">${data.error}</p>`;
      return;
    }

    // Display search results using data.hotels (replace with your logic)
    searchResults.innerHTML = `<h2>Search Results</h2><ul>`;
    for (const hotel of data.hotels) {
      searchResults.innerHTML += `
        <li>
          <a href="<span class="math-inline">\{hotel\.url\}" target\="\_blank"\>
<h3\></span>{hotel.name}</h3>
            <p>${hotel.description}</p>
            <p><b>Price:</b> ${hotel.price}</p>
          </a>
        </li>
      `;
    }
    searchResults.innerHTML += `</ul>`;
  })
  .catch(error => {
    searchResults.innerHTML = `<p class="text-
