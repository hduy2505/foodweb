import React from 'react';
import { authApi } from '../api/authApi';
import { useNavigate } from 'react-router-dom';

export const roleFunc = {
  getRole: async () => {
    const Role = await authApi
      .validateRole()
      .then((EC) => {
        console.log('Roles here: EC ', EC);
        console.log('Type of EC: ', typeof EC);
        //check possible values of "EC"
        switch (EC) {
        
          case 1: // Return "admin" string
            return 'admin';
          case 2: // Return "user" string
            return 'user';
          default:
            throw new Error('EC does not supported'); // Throw an error with message "EC does not support"
        }
      })
      .then((role) => {
        return role;
      });

    return Role;
  },
};
