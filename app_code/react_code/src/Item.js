import React from "react";

export default function Item({ id, name, explosive }) {
  if (explosive) {
    return (
      <li>
        ({id}) {name} [EXPLOSIVE]
      </li>
    );
  } else {
    return (
      <li>
        ({id}) {name}
      </li>
    );
  }
}
