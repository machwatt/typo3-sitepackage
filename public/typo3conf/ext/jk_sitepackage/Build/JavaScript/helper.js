/**
 * This is a more supported way to toggle classes on elements.
 * This method expects an selector as querySelector and the class to toggle.
 */
function toggleClass(selector, classname) {
  selector.classList.contains(classname) ? selector.classList.remove(classname) : selector.classList.add(classname)
}
