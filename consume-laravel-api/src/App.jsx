import { useState } from 'react'
import reactLogo from './assets/react.svg'
import viteLogo from '/vite.svg'
import './App.css'
import Case from './components/Case'

function App() {
  const [count, setCount] = useState(0)

  return (
    <Case>
      <div className='bg-gray-900 flex items-center justify-center min-h-screen'>
        <div className="bg-gray-800 border-t border-gray-600 shadow rounded-lg max-w-lg w-full p-6">
          <h4 className='text-white text-2xl'>Hello Rafly</h4>
            <p className='text-lg text-gray-400 leading-relaxed'>A JavaScript library for building user interfaces</p>
        </div>
      </div>
    </Case>
  )
}

export default App