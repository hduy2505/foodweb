//describes the structure of an error object 
interface AppError {
    errorCode: number;
    errorMsg: string;
    errorField: string;
  }
  
  export type { AppError };
  