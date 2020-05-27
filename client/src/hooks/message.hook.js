import React, { useState, useEffect, useCallback } from "react";

import "./style.css";

let timeout = null;
let openTimeout = null;

export const useMessage=(props)=> {
  const {
    
    isOpen = false,
    duration = 2000,
    title,
    description,
    hasCloseBtn = false,
    hasAutoDismiss = true,
    closeCallback = null,
    classNames = []
  } = props;

  const [isOpenState, setOpen] = useState(false);
  const onClose = useCallback(() => {
    const toastElement = document.querySelectorAll(".ReactToast");
    if (closeCallback) closeCallback();
    setOpen(false);
    setTimeout(() => {
      if (toastElement) {
        toastElement[0].style = "";
      }
    }, duration);
  }, [closeCallback, setOpen, duration]);

  useEffect(() => {
    if (timeout) clearTimeout(timeout);
    if (openTimeout) clearTimeout(openTimeout);
    if (isOpen && (isOpen !== isOpenState)) {
      openTimeout = setTimeout(() => setOpen(true), 50);
    } else if (!isOpen) {
      setOpen(false);
    }
    if (isOpen && hasAutoDismiss) {
      timeout = setTimeout(onClose, duration);
    }
  }, [isOpen, duration, setOpen, hasAutoDismiss, onClose, isOpenState]);

  return (
    <div
      className={`ReactToast${
        isOpenState ? ' isOpen' : ''}${
          classNames && classNames.length ? ` ${classNames.join(' ').toString()}` : ''
        }`
      }
    >
      {title && <h2 className="ReactToast--title">{title}</h2>}
      {description && (
        <div className="ReactToast--description">{description}</div>
      )}
      
      {hasCloseBtn && (
        <button className="ReactToast--close" onClick={onClose}>
          &times;
        </button>
      )}
    </div>
  );
}