<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokémon Encounter Methods</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Pokémon Encounter Methods</h1>
    <table id="encounterTable">
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody id="encounterBody">
            <!-- Data will be populated here -->
        </tbody>
    </table>

    <script>
        // Function to fetch data from the API
        async function fetchEncounterMethods() {
            try {
                const response = await fetch('https://pokeapi.co/api/v2/encounter-method/?id=1&name=walk');
                const data = await response.json();
                return data.results;
            } catch (error) {
                console.error('Error fetching data:', error);
            }
        }

        // Function to render data in the table
        async function renderData() {
            const encounterMethods = await fetchEncounterMethods();
            const tableBody = document.getElementById('encounterBody');

            encounterMethods.forEach(method => {
                const row = document.createElement('tr');
                const nameCell = document.createElement('td');
                const descriptionCell = document.createElement('td');

                nameCell.textContent = method.name;
                descriptionCell.textContent = method.description || 'N/A';

                row.appendChild(nameCell);
                row.appendChild(descriptionCell);
                tableBody.appendChild(row);
            });
        }

        // Call the renderData function when the page loads
        window.onload = renderData;
    </script>
</body>
</html>
