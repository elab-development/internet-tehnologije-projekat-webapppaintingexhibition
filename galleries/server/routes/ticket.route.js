import express from 'express';
import * as ticketController from '../controllers/ticket.controller.js';
import { verifyToken } from '../middlewares/verifyToken.js';

const router = express.Router();

// POST Endpoints
router.post('/', verifyToken, ticketController.createTicket);

// GET Endpoints
router.get('/', ticketController.getTickets);
router.get('/:id', ticketController.getTicket);

// PUT Endpoints
router.put('/:id', verifyToken, ticketController.updateTicket);

// DELETE Endpoints
router.delete('/:id', verifyToken, ticketController.deleteTicket);

export default router;