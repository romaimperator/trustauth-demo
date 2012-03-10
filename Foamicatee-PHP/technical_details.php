<div class="row">
  <header class="jumbotron subhead">
    <h1>Technical Details</h1>
  </header>
  <div class="span12">
    <h3>Existing User Authentication Process</h3>
    <ol>
      <li>The user clicks "Login".</li>
      <li>Foamicator fetches the authentication URL from the DOM.</li>
      <li>Foamicator retrieves the public key and generates the client random value.</li>
      <li>Foamicator transmits these two values to the server URL to begin the process.</li>
      <li>The server retrieves theses values from the POST data and calls the get_challenge function in the Foamicatee library.</li>
      <li>Foamicatee creates the server random and the pre master secret.</li>
      <li>Foamicatee encrypts both of these values independently using the public key it was sent and returns them as JSON to the server.</li>
      <li>The server stores the public key, the client random, and the server data generated by Foamicatee for the next request and then returns the JSON string to Foamicator.</li>
      <li>Foamicator decrypts these two values using the private key and then generates the master secret using the pre master secret, the server random, and the client random.</li>
      <li>Foamicator then creates the MD5 and SHA-1 hashes that are the challenge response, encrypts them using the private key and sends them to the server.</li>
      <li>The server retrieves the stored data, adds the two hashes from the POST data, and calls the authenticate function from the Foamicatee library.</li>
      <li>Foamicatee uses the public key to decrypt the hashes.</li>
      <li>Foamicatee calculates the master key and the answers to the challenge itself.</li>
      <li>These server generated hashes are compared to the two decrypted from the client and if they match the public key is authenticated.</li>
      <li>The server logs the user in using the public key or ends the authentication session.</li>
      <li>The server then returns JSON to Foamicator which redirects the addon to one of two URLs depending on whether the authentication was successful or failed.</li>
      <li>Foamicator then redirects to the received URL.</li>
    </ol>
    <h3>New User Authentication Process</h3>
    <ol>
      <li>Same as above up to number 15.</li>
      <li>If the server does not find the public key in the database then it creates a new account, stores the key, and logs the user in as the new account.</li>
      <li>The server then returns JSON to Foamicator which redirects the addon to one of two URLs depending on whether the authentication was successful or failed.</li>
      <li>Foamicator then redirects to the received URL.</li>
    </ol>
  </div>
</div>
