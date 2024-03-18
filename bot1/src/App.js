import React, { useState, useEffect, useRef  } from 'react';
import './App.css';
import Modal from './modal';

function App() {
    const [message, setMessage] = useState("");
    const [response, setResponse] = React.useState("");
    const [conversation, setConversation] = useState([]);
    const [chatList, setChatList] = useState([]);
    const chatEndRef = useRef(null);
    const [showModal, setShowModal] = useState(true);
    

    // Close the modal by setting showModal to false
    const closeModal = () => {
        setShowModal(false);
    };

    const handleDashboardRedirect = () => {
        window.location.href = '../dashboard.php';
    };

    const handleProfileRedirect = () => {
        window.location.href = '../dashboard.php';
    };

    const handleInformationRedirect = () => {
        window.location.href = '../dashboard.php';
    };



    const handleChange = (e) => setMessage(e.target.value);



    // Add an effect that runs once on component mount
    useEffect(() => {
        // Close modal when clicking outside of it
        const handleOutsideClick = (event) => {
            if (event.target.id === 'modal-backdrop') {
                closeModal();
            }
        };

        // Add when the component is mounted
        window.addEventListener('click', handleOutsideClick);

        // Remove when the component is unmounted
        return () => window.removeEventListener('click', handleOutsideClick);
    }, []);


    useEffect(() => {
        fetch('/api/chat-list')
            .then(response => response.json())
            .then(data => setChatList(data.chats))
            .catch(error => console.error('Error fetching chat list:', error));
    }, []);
    
    useEffect(() => {
        chatEndRef.current?.scrollIntoView({ behavior: "smooth" });
    }, [conversation]); 


    const handleSubmit = async (e) => {
        e.preventDefault();
        if (!message.trim()) return;
        
        const userMessage = { text: message, sender: 'user' };
        setConversation(prevConvo => [...prevConvo, userMessage]);

        try {
            const response = await fetch('http://18.133.105.236:3000', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ message })
            });
        
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
        
            const data = await response.json();
            const aiMessage = { text: data.message, sender: 'ai' };
            setConversation(convo => [...convo, aiMessage]);
        } catch (error) {
            console.error('Error:', error);
            setResponse("Failed to get a response from the AI."); // Provide feedback to the user
        }

        setMessage(""); 
    };

    return (
        <div className="App">
            {showModal && (
                <div className="modal-backdrop" onClick={closeModal}>
                    <div className="modal" onClick={(e) => e.stopPropagation()}>
                    <div className="modal__content">
                        <h1 className="modal__title">Welcome</h1>
                        <p className="modal__text">Welcome to GreenBot, your virtual assistant designed to help you navigate environmental topics, offer advice, and provide answers to your queries. Whether you're looking for information on sustainability practices or need assistance with environmental calculations, GreenBot is here to help.</p>
                        <button className="modal__btn" onClick={closeModal}>Close &rarr;</button>
                        <span className="modal__close" onClick={() => setShowModal(false)}>&times;</span>
                    </div>
                    </div>
                </div>
            )}

        <header className="app-header">
            <div className="header-content">
            <h1 style={{ color: 'white' }}>t</h1>
            </div>
      </header>

        <section id="sidebar">
                <a href="#" class="brand">
                    <i class="fas fa-solid fa-tree"></i>
                    <span class="text">  Hidden Leaf</span>
                </a>
                <ul class="side-menu top">
                    <li onClick={handleDashboardRedirect}>
                        <a href="#">
                            <i className='bx bxs-dashboard'></i>
                            <span className="text">Dashboard</span>
                        </a>
                    </li>

                    <li onClick={handleProfileRedirect}>
                        <a href="#">
                            <i class='bx bxs-shopping-bag-alt' ></i>
                            <span class="text">My Profile</span>
                        </a>
                    </li>

                    <li class="active">
                        <a href="#">
                            <i class='bx bxs-doughnut-chart' ></i>
                            <span class="text">Calculator</span>
                        </a>
                    </li>

                    <li onClick={handleInformationRedirect}>
                        <a href="#">
                            <i class='bx bxs-message-dots' ></i>
                            <span class="text">Information</span>
                        </a>
                    </li>
                    
                </ul>
                <ul class="side-menu">
                    <li>
                        <a href="#">
                            <i class='bx bxs-cog' ></i>
                            <span class="text">Settings</span>
                        </a>
                    </li>
                    <li>
                        <a href="../view/logout.php" className="logout">
                            <i className='bx bxs-log-out-circle'></i>
                            <span className="text">Logout</span>
                        </a>
                    </li>
                </ul>
        </section>    


            <div className="chat-window">
                <div className="chat-area">
                    {conversation.map((entry, index) => (
                        <div key={index} className={`message ${entry.sender === 'user' ? 'user-message' : 'ai-message'}`}>
                            <span className="message-content">{entry.text}</span>
                        </div>
                    ))}
                    <div ref={chatEndRef} />
                </div>
                <form onSubmit={handleSubmit} className="input-area">
                    <input
                        type="text"
                        className="input-field"
                        placeholder="Type your message here..."
                        value={message}
                        onChange={handleChange}
                        autoFocus
                    />
                    <button className="submit-button" type="submit">Send</button>
                </form>
            </div>
        </div>
    );
}

export default App;

