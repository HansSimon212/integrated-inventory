import React, { useState, useRef } from "react";
import Inventory from "./Inventory.js";
import Header from "./Header";
import Input from "./Input";

// Void -> Array
// Generates a default/initial inventory
function createInitialInventory() {
  let defaultItems = [];

  for (let i = 0; i < 10; i++) {
    defaultItems.push(createInitialItem(i));
  }

  return defaultItems;
}

// Void -> Object
// Generates an item with the given ID to go into the initial inventory.
function createInitialItem(id) {
  let explodes; // is this element explosive?

  // all odd elements are marked as explosive
  id % 2 === 0 ? (explodes = false) : (explodes = true);

  return {
    id: id,
    name: `Item ${id}`,
    explosive: explodes,
  };
}

function App() {
  const [items, setItems] = useState(createInitialInventory);

  return (
    <>
      <Header />

      <Input items={items} />

      <Inventory items={items} />
    </>
  );
}

export default App;
