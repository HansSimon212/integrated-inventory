import React, { useState, useRef } from "react";

export default function Input({ items }) {
  const textFieldRef = useRef();

  // Void -> Void
  // Adds an item with the given name, a unique ID, and the given explosivity
  function handleAddItem(e) {
    //TODO
  }

  // Void -> Void
  // Removes all items with the given name
  function handleRemoveItem(e) {
    //TODO
  }

  // Void -> Void
  // Clears the item entry text field.
  function handleClear(e) {
    textFieldRef.current.value = null;
  }

  return (
    <>
      <input type="text" ref={textFieldRef} />
      <button onClick={handleClear}>Clear</button>
      <br />
      <button onClick={handleAddItem}>Add Item</button>
      <button onClick={handleRemoveItem}>Remove Item</button>
    </>
  );
}
