import { combineReducers } from 'redux';

export function error(state = null, action) {
  switch (action.type) {
    case 'LABEL_SHOW_ERROR':
      return action.error;

    case 'LABEL_SHOW_MERCURE_DELETED':
      return `${action.retrieved['@id']} has been deleted by another user.`;

    case 'LABEL_SHOW_RESET':
      return null;

    default:
      return state;
  }
}

export function loading(state = false, action) {
  switch (action.type) {
    case 'LABEL_SHOW_LOADING':
      return action.loading;

    case 'LABEL_SHOW_RESET':
      return false;

    default:
      return state;
  }
}

export function retrieved(state = null, action) {
  switch (action.type) {
    case 'LABEL_SHOW_SUCCESS':
    case 'LABEL_SHOW_MERCURE_MESSAGE':
      return action.retrieved;

    case 'LABEL_SHOW_RESET':
      return null;

    default:
      return state;
  }
}

export function eventSource(state = null, action) {
  switch (action.type) {
    case 'LABEL_SHOW_MERCURE_OPEN':
      return action.eventSource;

    case 'LABEL_SHOW_RESET':
      return null;

    default:
      return state;
  }
}

export default combineReducers({ error, loading, retrieved, eventSource });
