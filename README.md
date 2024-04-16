# classassignment

## Project Components

- `login.html`: A login page for user authentication.
- `student-details.php`: A form for entering student details.
- `submit-details.php`: Server-side script for processing and storing form data.
- `styles.css`: CSS styles for the web pages.
- `validation.js`: JavaScript file for client-side validation.

## Features

- **Client-Side Validation**: Ensures input format correctness before submission using HTML5 and JavaScript.
- **Server-Side Validation**: Further validates data on the server using PHP to protect against malicious data.
- **Secure Authentication**: Users must login to access the form, with passwords securely hashed in the database.
- **Session Management**: Uses PHP sessions to maintain user state across multiple pages.

### Sequence

1. **User Authentication**:
   - Users are greeted by `login.html` where they must enter their credentials.
   - Upon successful login, a session is initiated, and the user is redirected to `student-details.php`.

2. **Data Entry**:
   - On `student-details.php`, users fill in the student details form.
   - Client-side JavaScript validations check the form data as the user types.
   - Upon submission, data is sent to `submit-details.php`.

3. **Data Processing**:
   - `submit-details.php` performs server-side validation.
   - If validation passes, data is sanitized and stored in the database.
   - Users are then redirected or informed of the successful operation.

### Validation

- **Email**: Must be a valid Gmail address (checked via regex in both JavaScript and PHP).
- **Matric Number**: Numeric only, 5-10 digits.
- **Phone Numbers**: Must be 10 digits (optional for home phone).
