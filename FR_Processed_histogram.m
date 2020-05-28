function varargout = FR_Processed_histogram(varargin)

gui_Singleton = 1;
gui_State = struct('gui_Name',       mfilename, ...
                   'gui_Singleton',  gui_Singleton, ...
                   'gui_OpeningFcn', @FR_Processed_histogram_OpeningFcn, ...
                   'gui_OutputFcn',  @FR_Processed_histogram_OutputFcn, ...
                   'gui_LayoutFcn',  [] , ...
                   'gui_Callback',   []);
if nargin && ischar(varargin{1})
    gui_State.gui_Callback = str2func(varargin{1});
end

if nargout
    [varargout{1:nargout}] = gui_mainfcn(gui_State, varargin{:});
else
    gui_mainfcn(gui_State, varargin{:});
end

function FR_Processed_histogram_OpeningFcn(hObject, ~, handles, varargin)
% This function has no output args, see OutputFcn.
% hObject    handle to figure
)

% Choose default command line output for FR_Processed_histogram
handles.output = hObject;

% Update handles structure
guidata(hObject, handles);

%HounDprojectfacematchingalgorithm------------------------------
global total_sub train_img sub_img max_hist_level bin_num form_bin_num;

total_sub = 40;
train_img = 200;
sub_img = 10;
max_hist_level = 256;
bin_num = 9;
form_bin_num = 29;
%--------------------------------------------------------------------------
% --- Outputs from this function are returned to the command line.
function varargout = FR_Processed_histogram_OutputFcn(hObject, eventdata, handles) 
% varargout  cell array for returning output args (see VARARGOUT);
% hObject    handle to figure


% Get default command line output from handles structure
varargout{1} = handles.output;

%--------------------------------------------------------------------------
% --- Executes on button press in train_button.  
function train_button_Callback(hObject, eventdata, handles)
% hObject    handle to train_button (see GCBO)


global train_processed_bin;
global total_sub train_img sub_img max_hist_level bin_num form_bin_num;

train_processed_bin(form_bin_num,train_img) = 0;
K = 1;
train_hist_img = zeros(max_hist_level, train_img);

for Z=1:1:total_sub 
  for X=1:2:sub_img    %%%train on odd number of images of each subject
    
    I = imread( strcat('ORL\S',int2str(Z),'\',int2str(X),'.bmp') );        
    [rows cols] = size(I);
    
    for i=1:1:rows
       for j=1:1:cols
           if( I(i,j) == 0 )
               train_hist_img(max_hist_level, K) =  train_hist_img(max_hist_level, K) + 1;                            
           else
               train_hist_img(I(i,j), K) = train_hist_img(I(i,j), K) + 1;                         
           end
       end   
    end   
     K = K + 1;        
  end  
 end  

[r c] = size(train_hist_img);
sum = 0;
for i=1:1:c
    K = 1;
   for j=1:1:r        
        if( (mod(j,bin_num)) == 0 )
            sum = sum + train_hist_img(j,i);            
            train_processed_bin(K,i) = sum/bin_num;
            K = K + 1;
            sum = 0;
        else
            sum = sum + train_hist_img(j,i);            
        end
    end
    train_processed_bin(K,i) = sum/bin_num;
end

display ('Training Done')
save 'train'  train_processed_bin;

%--------------------------------------------------------------------------
% --- Executes on button press in Testing_button.    
function Testing_button_Callback(hObject, eventdata, handles)
% hObject    handle to Testing_button (see GCBO)
)
global train_img max_hist_level bin_num form_bin_num;
global train_processed_bin;
global filename pathname I

load 'train'
test_hist_img(max_hist_level) = 0;
test_processed_bin(form_bin_num) = 0;


 [rows cols] = size(I);
  
    for i=1:1:rows
       for j=1:1:cols
           if( I(i,j) == 0 )
               test_hist_img(max_hist_level) =  test_hist_img(max_hist_level) + 1;                            
           else
               test_hist_img(I(i,j)) = test_hist_img(I(i,j)) + 1;                         
           end
       end   
    end   
    
  [r c] = size(test_hist_img);
  sum = 0;

    K = 1;
    for j=1:1:c        
        if( (mod(j,bin_num)) == 0 )
            sum = sum + test_hist_img(j);            
            test_processed_bin(K) = sum/bin_num;
            K = K + 1;
            sum = 0;
        else
            sum = sum + test_hist_img(j);            
        end
    end
  
 test_processed_bin(K) = sum/bin_num;
    
sum = 0;
K = 1;

    for y=1:1:train_img
        for z=1:1:form_bin_num        
          sum = sum + abs( test_processed_bin(z) - train_processed_bin(z,y) );  
        end         
        img_bin_hist_sum(K,1) = sum;
        sum = 0;
        K = K + 1;
    end

    [temp M] = min(img_bin_hist_sum);
    M = ceil(M/5);
    getString_start=strfind(pathname,'S');
    getString_start=getString_start(end)+1;
    getString_end=strfind(pathname,'\');
    getString_end=getString_end(end)-1;
    subjectindex=str2num(pathname(getString_start:getString_end));
 
    if (subjectindex == M)
      axes (handles.axes3)
      %image no: 5 is shown for visualization purpose
      imshow(imread(strcat('ORL\S',num2str(M),'\5.bmp')))    
      msgbox ( 'Correctly Recognized');
    else
     display ([ 'Error==>  Testing Image of Subject >>' num2str(subjectindex) '  matches with the image of subject >> '  num2str(M)])
     axes (handles.axes3)
     %image no: 5 is shown for visualization purpose
     imshow(imread(strcat('ORL\S',num2str(M),'\5.bmp')))    
     msgbox ( 'Incorrectly Recognized');
    end
 
display('Testing Done')
%--------------------------------------------------------------------------
function box_Callback(hObject, eventdata, handles)
% hObject    handle to box (see GCBO)
% -------------------------------------------------------------------------
function box_CreateFcn(hObject, eventdata, handles)

if ispc && isequal(get(hObject,'BackgroundColor'), get(0,'defaultUicontrolBackgroundColor'))
    set(hObject,'BackgroundColor','white');
end
%--------------------------------------------------------------------------

function Input_Image_button_Callback(hObject, eventdata, handles)

global filename pathname I
[filename, pathname] = uigetfile('*.bmp', 'Test Image');
axes(handles.axes1)
%imgpath=strcat(pathname,filename);
imgpath=strcat(pathname,filename);
I = imread(imgpath);
imshow(I)
  
%--------------------------------------------------------------------------
% --- Executes during object creation--------------------------------------
function axes3_CreateFcn(hObject, eventdata, handles)
%--------------------------------------------------------------------------
% --- End   of algorithm-----------------------------------------------------------------




