import React from 'react';
import './Modal.css'; 

const Modal = ({ showModal, setShowModal }) => {
  const closeModal = () => {
    setShowModal(false);
  };

  const stopPropagation = (e) => {
    e.stopPropagation();
  };

  return (
    showModal && (
      <div className="modal-container" id="modal-opened" onClick={closeModal}>
        <div className="modal" onClick={stopPropagation}>
          <div className="modal__details">
            <h1 className="modal__title">Welcom</h1>
            <p className="modal__description">Sentence that will tell user what this modal is for or something.</p>
          </div>
          <p className="modal__text">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis ex dicta maiores libero minus obcaecati iste optio, eius labore repellendus.
          </p>
          <button className="modal__btn">Button &rarr;</button>
          <a href="#modal-closed" className="link-2" onClick={closeModal}></a>
        </div>
      </div>
    )
  );
};

export default Modal;
