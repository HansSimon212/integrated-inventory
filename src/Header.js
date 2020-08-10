import React from "react";

export default function Header() {
  return (
    <header class="header">
      <img src="../public/images/main_icon.png" alt="Main Icon"></img>

      <h1>Inventory</h1>

      <div class="navbar">
        <ul>
          <li>Make a Transaction</li>
          <li>View Inventory</li>
          <li>Contact Us</li>
        </ul>
      </div>
    </header>
  );
}
