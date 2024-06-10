<!DOCTYPE html>
<html>
<head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function(){
            // Counter to keep track of the number of file inputs
            var counter = 1;

            // Function to add a new file input
            function addFileInput() {
                // Create a new file input element
                var newFileInput = $('<input type="file" name="file[]">');

                // Append the new file input to the container
                $('#file-input-container').append(newFileInput);

                // Increment the counter
                counter++;
            }

            // Event listener for the "Add" button
            $('#add-button').click(function() {
                addFileInput();
            });
        });
    </script>
</head>
<body>
    <form>
        <div id="file-input-container">
            <input type="file" name="file[]">
        </div>
        <button type="button" id="add-button">Add</button>
        <input type="submit" value="Submit">
    </form>
</body>
</html>