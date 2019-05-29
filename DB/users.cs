using System;
using System.Collections;
using System.Collections.Generic;
using System.Text;
namespace Naturalhr_db
{
    #region Users
    public class Users
    {
        #region Member Variables
        protected string _first_name;
        protected string _last_name;
        protected unknown _date_of_birth;
        protected string _email;
        protected string _password;
        protected int _ID;
        #endregion
        #region Constructors
        public Users() { }
        public Users(string first_name, string last_name, unknown date_of_birth, string email, string password)
        {
            this._first_name=first_name;
            this._last_name=last_name;
            this._date_of_birth=date_of_birth;
            this._email=email;
            this._password=password;
        }
        #endregion
        #region Public Properties
        public virtual string First_name
        {
            get {return _first_name;}
            set {_first_name=value;}
        }
        public virtual string Last_name
        {
            get {return _last_name;}
            set {_last_name=value;}
        }
        public virtual unknown Date_of_birth
        {
            get {return _date_of_birth;}
            set {_date_of_birth=value;}
        }
        public virtual string Email
        {
            get {return _email;}
            set {_email=value;}
        }
        public virtual string Password
        {
            get {return _password;}
            set {_password=value;}
        }
        public virtual int ID
        {
            get {return _ID;}
            set {_ID=value;}
        }
        #endregion
    }
    #endregion
}