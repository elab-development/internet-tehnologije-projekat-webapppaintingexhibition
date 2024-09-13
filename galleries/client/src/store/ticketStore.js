import { create } from 'zustand';
import axios from 'axios';

const API_URL = 'http://localhost:8000/api/tickets';
axios.defaults.withCredentials = true;

export const useTicketStore = create((set) => ({
  // State
  error: null,
  isLoading: false,

  // Create Ticket
  createTicket: async (data) => {
    set({ isLoading: true, error: null });
    try {
      const response = await axios.post(`${API_URL}`, data);

      set({
        isLoading: false,
      });
      return response;
    } catch (error) {
      set({
        error:
          error.response.data.message ||
          'Something went wrong while creating new ticket',
        isLoading: false,
      });
      throw error;
    }
  },
}));