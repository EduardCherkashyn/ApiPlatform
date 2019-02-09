import React from 'react';
import { Route } from 'react-router-dom';
import { List, Create, Update, Show } from '../components/attachment/';

export default [
  <Route path="/attachments/create" component={Create} exact key="create" />,
  <Route path="/attachments/edit/:id" component={Update} exact key="update" />,
  <Route path="/attachments/show/:id" component={Show} exact key="show" />,
  <Route path="/attachments/" component={List} exact strict key="list" />,
  <Route path="/attachments/:page" component={List} exact strict key="page" />
];
