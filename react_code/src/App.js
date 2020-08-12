import React, { useState, useRef, useEffect } from "react";
import Inventory from "./Inventory.js";
import Header from "./Header";

const LOCAL_STORAGE_ITEMS_KEY = `inventory.items`;

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
  const textFieldRef = useRef();

  // loads item list on start/reload
  useEffect(() => {
    const storedItems = JSON.parse(
      localStorage.getItem(LOCAL_STORAGE_ITEMS_KEY)
    );

    setItems(storedItems);
  }, []);

  // stores item list on change
  useEffect(() => {
    localStorage.setItem(LOCAL_STORAGE_ITEMS_KEY, JSON.stringify(items));
    alert("Save");
  }, [items]);

  function handleAddItem(e) {
    let name = textFieldRef.current.value;
    // disallows empty names
    if (name === "") {
      return;
    }

    for (const item of items) {
      if (item.name === name) {
        // TODO: display error message on addition of item with existing name
        return;
      }
    }

    let newItem = {
      id: 311,
      name: name,
      explosive: true,
    };

    setItems((prev) => [...prev, newItem]);
  }

  // Event -> Void
  // Clears the item entry text field
  function handleClear(e) {
    textFieldRef.current.value = null;
  }

  // Event -> Void
  // Removes the item with the given name from the inventory
  function handleRemoveItem(e) {
    let input = textFieldRef.current.value;
    if (input === "") return;

    let itemsCpy = JSON.parse(JSON.stringify(items));

    for (let i = 0; i < itemsCpy.length; i++) {
      if (itemsCpy[i].name === input) {
        itemsCpy.splice(i, 1);
        setItems(itemsCpy);
      }
    }
  }

  return (
    <>
      <Header />

      {/* Input Section*/}
      <input type="text" ref={textFieldRef} />
      <button onClick={handleAddItem}>Add Item</button>
      <button onClick={handleClear}>Clear</button>
      <button onClick={handleRemoveItem}>Remove Item</button>

      <Inventory items={items} />
    </>
  );
}

export default App;
